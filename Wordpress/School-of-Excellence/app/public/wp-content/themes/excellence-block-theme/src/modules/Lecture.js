import * as slide from "./SlideUpDown";

class Lecture {
    constructor() {
        this.editButtons = document.querySelectorAll(".edit-lecture");
        this.deleteButtons = document.querySelectorAll(".delete-lecture");
        this.saveButtons = document.querySelectorAll(".save-btn");
        this.cancelButtons = document.querySelectorAll(".cancel-btn");
        this.createButton = document.querySelector(".create-lecture");
        this.newTitle = document.querySelector(".new-lecture-title");
        this.newContent = document.querySelector(".new-lecture-content");
        this.lectureList = document.querySelector("#lectures");
        this.title = '';
        this.content = '';
        this.events();
    }
    events() {
        this.editButtons.forEach(button => {
            button.addEventListener("click", this.editLecture.bind(this));
        });
        this.deleteButtons.forEach(button => {
            button.addEventListener("click", this.deleteLecture.bind(this));
        });
        this.saveButtons.forEach(button => {
            button.addEventListener("click", this.saveLecture.bind(this));
        });
        this.cancelButtons.forEach(button => {
            button.addEventListener("click", this.makeReadOnly.bind(this));
        });
        this.createButton.addEventListener("click", this.createLecture.bind(this));
    }

    //methods
    editLecture(event) {
        console.log("The Edit button was clicked.");
        var currentLecture = event.target.parentNode.parentNode;
        console.log(currentLecture);

        //remove readonly attribute
        var elems = currentLecture.querySelectorAll('.lecture-title, .lecture-content');
        elems.forEach(elem => {
            elem.removeAttribute('readonly');
            elem.classList.add('lecture-editable');
        });
        elems[0].focus();

        //save the title and content values
        this.title = elems[0].value;
        this.content = elems[1].value;

        //make save and cancel button visible
        var btns = currentLecture.querySelectorAll(".save-btn, .cancel-btn");
        btns.forEach(btn => {
            btn.classList.add("btn-visible");
        });
    }

    saveLecture(event) {
        console.log("The Save button was clicked.");

        var currentLecture = event.target.parentNode;
        console.log(currentLecture);
        console.log(siteData.root_url + "/wp-json/wp/v2/lecture/" + currentLecture.getAttribute('data-id'));

        var updatedLecture = {
            'title': currentLecture.querySelector(".lecture-title").value,
            'content': currentLecture.querySelector(".lecture-content").value
        }

        fetch(siteData.root_url + "/wp-json/wp/v2/lecture/" + currentLecture.getAttribute('data-id'), {
            credentials: 'same-origin',
            method: "PUT",
            headers: {
                "X-WP-Nonce": siteData.nonce,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(updatedLecture)
        }).then((response) => {
            return response.json();
        }).then((data) => {
            if (data.status !== "publish")
                console.log('Request failed.');
            else {
                console.log("Lecture note edited.");
                this.makeReadOnly(event);
            }
            console.log(data);
        });
    }

    makeReadOnly(event) {

        var currentLecture = event.target.parentNode;
        console.log(currentLecture);

        var elems = currentLecture.querySelectorAll('.lecture-title, .lecture-content');
        elems.forEach(elem => {
            elem.readonly = true;
            elem.classList.remove('lecture-editable');
        });
        var btns = currentLecture.querySelectorAll(".save-btn, .cancel-btn");
        btns.forEach(btn => {
            btn.classList.remove("btn-visible");
        });

        var btn = event.target;
        //update values if save button was clicked
        if (btn.classList.contains("save-btn")) {
            elems[0].value = currentLecture.querySelector(".lecture-title").value;
            elems[1].value = currentLecture.querySelector(".lecture-content").value;
        }
        //restore old values if cancel button was clicked
        else {
            elems[0].value = this.title;
            elems[1].value = this.content;
        }
    }

    deleteLecture(event) {
        console.log("The Delete button was clicked.");

        var currentLecture = event.target.parentNode.parentNode;
        console.log(currentLecture);
        console.log(siteData.root_url + "/wp-json/wp/v2/lecture/" + currentLecture.getAttribute('data-id'));

        fetch(siteData.root_url + "/wp-json/wp/v2/lecture/" + currentLecture.getAttribute('data-id'), {
            method: 'DELETE',
            credentials: 'same-origin',
            headers: {
                'X-WP-NONCE': siteData.nonce
            }
        }).then((response) => {
            return response.json();
        }).then((data) => {
            if (data.status != "trash")
                console.log('Request failed.');
            else {
                if(data.lecture_post_count <= 5 )
                    document.querySelector(".post-limit-exceeded").classList.remove("visible");
                console.log("Lecture note deleted.");
                slide.slideUp(currentLecture);
            }
            console.log(data);
        });
    }

    createLecture() {
        console.log("The Create button was clicked.");

        var newLecture = {
            'title': this.newTitle.value,
            'content': this.newContent.value,
            'status': 'publish'
        }

        fetch(siteData.root_url + "/wp-json/wp/v2/lecture/", {
            credentials: 'same-origin',
            method: "POST",
            headers: {
                "X-WP-Nonce": siteData.nonce,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(newLecture)
        }).then((response) => {
            return response.json();
        }).then((data) => {
            if (data == "Max post limit reached") {
                document.querySelector(".post-limit-exceeded").classList.add("visible");
                console.log("Create request unsuccessful. Post limit exceeded.");
            } else {
                if (data.status !== "private"){
                    console.log('Request failed.');
                } else {
                    console.log("Lecture note added.");
                    this.newTitle.value = '';
                    this.newContent.value = '';
         
                    var newLi = document.createElement('li');
                    newLi.dataset.id = data.id;
                    newLi.innerHTML = `
                        <div class="notes-container">
                            <input readonly class="lecture-title" value="${data.title.rendered}">
                            <span class="edit-lecture"><i class="fas fa-edit" aria-hidden="true"></i> Edit</span>
                            <span class="delete-lecture"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span>
                        </div>
                        <textarea readonly class="lecture-content">${data.content.raw}</textarea>
                        <span class="submit-lecture save-btn"><i class="fa fa-save" aria-hidden="true"></i> Save</span>
                        <span class="submit-lecture cancel-btn"><i class="fa fa-window-close" aria-hidden-="true"></i> Cancel</span>
                    `;
                    this.lectureList.prepend(newLi);
                    slide.slideDown(newLi);
         
                    newLi.querySelector(".edit-lecture").addEventListener('click', this.editLecture.bind(this));
                    newLi.querySelector(".delete-lecture").addEventListener('click', this.deleteLecture.bind(this));
                    newLi.querySelector(".save-btn").addEventListener('click', this.saveLecture.bind(this));
                                    newLi.querySelector(".cancel-btn").addEventListener('click', this.makeReadOnly.bind(this));
                }
            }
        });
    }

}
export default Lecture;