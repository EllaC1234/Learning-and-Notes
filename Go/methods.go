package main

import (
	"fmt"
	"math"
)

type Vertex struct {
	X, Y float64
}

// There are no classes in Go, but methods are functions attached to a type and act similarly
func (v Vertex) Abs() float64 {
	return math.Sqrt(v.X*v.X + v.Y*v.Y)
}

// Methods can also have pointer recievers, which means that the original receiver is modified rather than a copy
func (v *Vertex) Scale(f float64) {
	v.X = v.X * f
	v.Y = v.Y * f
}

func main() {
	fmt.Println("Explaining methods!!!!")
}

