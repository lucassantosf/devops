package main

import (
    "fmt"
    "time"
)

func main() {
    for {
        fmt.Printf("%s -- Hello, PluralSight!\n", time.Now().Format(time.RFC3339))
        time.Sleep(5 * time.Second)
    }
}
