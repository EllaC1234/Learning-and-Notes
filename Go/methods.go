package main

import (
	"math"
)

type Vertex2 struct {
	X, Y float64
}

// There are no classes in Go, but methods are functions attached to a type and act similarly
func (v Vertex2) Abs() float64 {
	return math.Sqrt(v.X*v.X + v.Y*v.Y)
}

// Methods can also have pointer recievers, which means that the original receiver is modified rather than a copy
func (v *Vertex2) Scale(f float64) {
	v.X = v.X * f
	v.Y = v.Y * f
}
