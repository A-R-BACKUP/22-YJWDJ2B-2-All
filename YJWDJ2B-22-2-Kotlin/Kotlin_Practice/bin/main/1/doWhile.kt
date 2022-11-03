package `1`

class doWhile {
}

fun main() {
    var value:Int
    do{
        value=(-5..5).random()
        print("$value")
    } while (value < 1)
    println("\n$value")
}