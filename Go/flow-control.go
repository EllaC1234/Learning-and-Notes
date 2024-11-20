// Flow control in Go: loops, conditionals

package main

import (
	"fmt"
	"math"
)

// Loops are just for loops in Go
func flowExamples() {

	// Traditional for loop
	// Has the start, stop and conditional values
	sum := 0
	for i := 0; i < 10; i++ {
		sum += i
	}
	fmt.Println(sum)

	// While loop
	sum2 := 1
	for sum2 < 1000 {
		sum2 += sum2
	}
	fmt.Println(sum2)

	// If statements
	// If statements can have a statement that executes at the start of the condition. Scoped to the if/else block
	if num := math.Pow(3, 2); num < 10 {
		fmt.Println(num)
	}

	// Defer statements
	// Defers code until after the surrounding function code runs
	// Defered code is pushed onto a stack and are executed in a last-in-first-out order (acts like recursion)
	for j := 0; j < 10; j++ {
		defer fmt.Println(j)
	}
}
