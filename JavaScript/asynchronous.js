// JS is single-threaded by nature
// Blocking code - any code that leaves a processor idle whilst waiting for another task to finish (like waiting for a network etc)
// JS is asynchronous, meaning it will not wait for blocking code until continuing with other computable tasks
// JS Engines have an event loop, which do the following:
    // Checks the call stacK
    // If the call stack is empty, but there are items in the callback queue, a callback is added to the stack
    // Callbacks are added when the even they are attached to ends

setTimeout(function(){
    console.log('setTimeout called for 4 seconds');
}, 4000); // 4000 = 4 seconds of idle time

setTimeout(function(){
    console.log('setTimeout called for 2 seconds');
}, 2000); // 2000 = 2 seconds of idle time

console.log('Called first');

// Promises are objects that handle asynchronous functions without having to nest many callbacks. They contain both the producing code and consuming code
// Async - makes the function asynchronous
// Await - pauses the execution of an async function until the promise resolves
async function myDisplay() {
    myPromise = new Promise(function(resolve) {
        resolve("Hey!!"); // resolve is returned or given to the then function
        // reject - is returned to the catch function 
    });
    result = await myPromise;
    console.log(result);
}

myDisplay();