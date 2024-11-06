// Objects, object literals and prototypes are all objects.

// Prototypes and classes
// A prototype is a simple object that other objects inherit from. Classes define prototypes, and the
// prototype is a blueprint (a generic object) for an instance (a more specific object). 

// Object
// Is initiated using a constructor. Inherits all properties of its class. They allow you to have both 
// public and private properties. The 'this' keyword is used to refer to the object instance. In older code,
// a function is used to create a "class" rather than a specialised "class" element.
// Any properties added to a constructor are static, and they cannot be accessed via the instance, only the
// class, unless the prototype is used.

class Animal {
    constructor(species, breed, age, colour, sound_type) { 
        this.species = species;
        this.breed = breed;
        this.age = age;
        this.colour = colour;
        this.sound_type = sound_type;
    }

    sound() {
        switch(this.species) {
            case "dog":
                console.log("woof");
            case "lion":
                console.log("roar");
            case "cat":
                console.log("meow");
            case "bird":
                console.log("squark");
        }
    }
}

const dog = new Animal("dog", "stafiture", 6, "blue", "bark");
dog.sound();

// This is the same functionality in a function constructor:
function Person(first, last, age, eyecolor) {
    this.firstName = first;
    this.lastName = last;
    this.age = age;
    this.eyeColor = eyecolor;
  }
  
const myFather = new Person("John", "Doe", 50, "blue");
const myMother = new Person("Sally", "Rally", 48, "green");


// Object literal 
// Object literal properties are all public by default. They don't have a class, constructor or prototype,
// so they must be completely copied every time another "instance" is created. It is a singleton - the only
// instance created. The 'this' keyword refers to the object in general.
const max = {
    species: "dog",
    breed: "stafiture",
    age: 6,
    colour: "blue",
    sound: function() {
        console.log("bark");
    }
}

max.sound();

// Properties can be added to object literals.
max.gender = "male";

// Deep cloning - a complete copy of the object and all of its levels (parents, children, etc)
// Shallow cloning - copying the "flat", one-level object
