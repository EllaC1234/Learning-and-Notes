package main

import (
	"encoding/json"
	"fmt"
	"net/http"
)

type Sheep struct {
	Name   string
	Age    string
	Colour string
}

var sheepSlice = make([]Sheep, 0, 100)

func sheep(w http.ResponseWriter, req *http.Request) {
	switch req.Method {
	case "GET":
		jsonData, err := json.Marshal(sheepSlice)
		if err != nil {
			http.Error(w, err.Error(), http.StatusInternalServerError)
		} else {
			w.Header().Set("Content-Type", "application/json")
			fmt.Fprintf(w, string(jsonData))
		}
	case "POST":
		var sheep Sheep
		err := json.NewDecoder(req.Body).Decode(&sheep)
		if err != nil {
			http.Error(w, err.Error(), http.StatusInternalServerError)
		} else {
			sheepSlice = append(sheepSlice, sheep)
			fmt.Fprintf(w, "New sheep added")
		}
	default:
		fmt.Fprintf(w, "Not supported.")
	}
}

func roast(w http.ResponseWriter, req *http.Request) {
	var sheep Sheep
	err := json.NewDecoder(req.Body).Decode(&sheep)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
	} else {
		for i, v := range sheepSlice {
			if v.Name == sheep.Name {
				sheepSlice = append(sheepSlice[:i], sheepSlice[i+1:]...)
			}
		}
	}
}

func main() {
	http.HandleFunc("/sheep", sheep)
	http.HandleFunc("/roast", roast)
	http.ListenAndServe(":8080", nil)
}
