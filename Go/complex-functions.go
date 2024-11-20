package main

import (
	"fmt"
	"math"
)

// Passing in a function as an argument
func compute(fn func(float64, float64) float64) float64 {
	return fn(3, 4) // Calls the argument with these specified values
}

// Function closures are functions that captures variables from the enclosing scope (this being outer()) even when they are not in scope of where the function is called.
func outer() func() int {
	x := 0
	return func() int {
		x++
		return x
	}
}

// Generic functions use a placeholder for the type, which will be compiled at runtime. Similar can be done with types
func GenericFunction[T any](value T) T {
	return value
}

func functionsExample() {
	hypot := func(x, y float64) float64 {
		return math.Sqrt(x*x + y*y)
	}

	fmt.Println(compute(hypot))

	inner := outer()
	fmt.Println(inner())
}
