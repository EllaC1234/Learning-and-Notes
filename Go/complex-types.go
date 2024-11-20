package main

import (
	"fmt"
)

// Struts are a collection of attributes and can be accessed with dot notation
// "type" means that we are defining a new data type "Vertex"
type Vertex struct {
	X int
	Y int
}

// Struct literals
var (
	v1 = Vertex{1, 2} // has type Vertex
	v2 = Vertex{X: 1} // Y:0 is implicit
)

func typesExample() {
	// Pointers (variables that store the memory address of another variable)
	i := 42
	p := &i         // Gets the memory address of i and assigns it to p
	fmt.Println(*p) // Accesses the value stored at the memory address

	// Arrays
	// Not immutable, but when assigned to another variable, a copy is made of the array
	var a [2]string // Set type and length
	a[0] = "Hello"
	a[1] = "World"
	fmt.Println(a[0], a[1])
	fmt.Println(a)

	// Slices
	// Not a fixed size. Does not store any data, but just references part of the array.
	var s []string = a[1:2]
	fmt.Println(s)
	fmt.Println(cap(s))          // Slice capacity (length of original array) vs len(s)
	s = append(s, "2", "3", "4") // Slices can be appended to within their cap. If the length exceeds the cap, a new array will be created and pointed to

	// Dynamically-sized arrays are just slices
	b := make([]int, 0, 5) // slice, len, cap (optional)
	fmt.Println(b)

	// Looping over a slice or map with range
	// Range returns an index and a copy of the item at that index. Either can be omitted.
	var pow = []int{1, 2, 4, 8, 16, 32, 64, 128}
	for i, v := range pow {
		fmt.Printf("2**%d = %d\n", i, v)
	}

	// Maps
	var ages map[string]int     // Declares variable
	ages = make(map[string]int) // Initializes
	ages["Steve"] = 78
	fmt.Println(ages["Steve"])

}
