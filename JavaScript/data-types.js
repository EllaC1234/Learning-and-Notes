// Dynamically typed language.
// All non-primitive data types are made of objects.
// Primitive types are immutable (value), objects are mutable (reference). Strings are considered primitive.

// Note: started off as an interpreted language, but now uses JIT compilation

// Type conversion
// Implicit
console.log(1 + '1' , typeof(1 + '1'));
console.log(null == 'null', typeof(null == 'null'));
// Explicit
let num = 1; 
let str_num = num.toString();
console.log("num:", str_num, " - type:", typeof(str_num));
