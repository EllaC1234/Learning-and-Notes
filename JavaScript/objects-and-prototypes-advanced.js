// Prototypes
// Prototypes are objects that other objects inherit from. Very similar to object inheritance or an interface in other languages.

// Constructor functions create prototypes
function Person(name, age) {
    this.name = name;
    this.age = age;
}

// You can then edit the prototype (in this case Person.prototype) and give it methods etc
Person.prototype.greet = function() {
    console.log("Hello, my name is " + this.name);   
};

const person1 = new Person("Alice", 30);
person1.greet();
// You cannot assign new properties to the prototype, but you can to an instance
person1.gender = "female";
console.log(person1.gender);

// Inheriting from Person
function Student(name, age, id, subject) {
    Person.call(this, name, age); // calls Person constructor function
    let _id = id // private, only accessible in the constructor function (naming convention)
    this.subject = subject;
}

Student.prototype = Object.create(Person.prototype); // Sets Student prototype to Person prototype
Student.prototype.constructor = Student; // Reassigns Student constructor function to call the correct one

// Classes
// Syntactical sugar for a prototype to mimic other languages
class Person2 { // Equivalent to prototype
    // Static methods belong to the class, not to each instance. Use for utility and helper functions.
    static capitalizeName(name){
        return name.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
    }

    // Equivalent to constructor function
    constructor(name, age) {
        this.name = Person2.capitalizeName(name);
        this.age = age;
    }

    greet() {
        console.log(`Hello, my name is ${this.name}`);
    }
}

const person2 = new Person2("alice", 30);
person2.greet(); 

class Student2 extends Person2 {
    #id; 

    constructor(name, age, id, subject) {
        super(name, age);
        this.#id = id; // private
        this.subject = subject
    }
}

// Object literals
// Object literals inherit directly from Object.prototype, and they are singletons. Everytime they are created, they have to be copied completely. 
const person = {
    name: "Joe",
    age: 90,
    greet: function() {
        console.log(`Hello, my name is ${this.name}`);
    }
}

person.greet();

const student = {
    id: 93847,
    __proto__: person // inheriting from person
}

// Deep cloning
// A complete copy of the object and all of its levels (parents, children, etc)

// Shallow cloning
// Copying the "flat", one-level object
