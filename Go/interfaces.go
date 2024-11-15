package main

import (
	"fmt"
	"math"
)

// Interfaces are implicitly satisfied by any type that implements the listed methods/attributes
// Supports polymorphism by different types act like the same type (like they can be imported into functions under the same "(interface) type")
type Shape interface {
    Area() float64
    Perimeter() float64
}

type Rectangle struct {
    Width  float64
    Height float64
}

func (r Rectangle) Area() float64 {
    return r.Width * r.Height
}

func (r Rectangle) Perimeter() float64 {
    return 2 * (r.Width + r.Height)   

}

func main() {}