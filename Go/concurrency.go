package main

import (
    "fmt"
)

// Concurrency is executing multiple tasks independently and simultaneously (different to parallelism, which runs commands at the same time on multiple CPUs)
// Go routines are lightweight threads and handle a concurrent task
// Channels communicate between routines

func sum(s []int, c chan int) {
    sum := 0
    for _, v := range s {
        sum += v
    }
    c <- sum // Send the sum to the channel
}

func main() {
    a := []int{7, 2, 8, -9, 4, 0}

    c := make(chan int) // Creates a channel
	// Two goroutines use the channel to communicate and execute a half each of the expression at the same time
    go sum(a[:len(a)/2], c)
    go sum(a[len(a)/2:], c)

    x, y := <-c, <-c // The channels pass in the results to the main routine for further use

    fmt.Println(x, y, x+y)
}