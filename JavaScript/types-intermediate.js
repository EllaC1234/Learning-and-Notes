// Object basics
// All non-primitive data types are made of objects, and they are all mutable, whilst primitives are immutable

// Type conversion - changing one type to another
// Implicit (type coercion)
console.log(1 + '1' , typeof(1 + '1')); // 1 converted to string
console.log(null == 'null', typeof(null == 'null')); // statement converted to boolean
// Explicit
let num = 1; 
let str = '1';
let str_num = num.toString();
let str_num2 = JSON.stringify(num);
let bool_num = Boolean(num);
let num_str = Number(str);
let num_str2 = parseInt(str);
console.log("num:", str_num, " - type:",typeof(str_num) );
console.log("num:", str_num2, " - type:",typeof(str_num2) );
console.log("num:", bool_num, " - type:",typeof(bool_num) );
console.log("num:", num_str, " - type:",typeof(num_str) );
console.log("num:", num_str2, " - type:",typeof(num_str2) );

// Static type checking - before the code is run, compiled languages
// Dynamic type checking - type is checked and assigned at runtime, interpreted languages
