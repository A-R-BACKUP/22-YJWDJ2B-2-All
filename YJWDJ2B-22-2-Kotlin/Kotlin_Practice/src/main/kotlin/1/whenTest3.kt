package `1`

class whenTest3 {
}

fun main(args: Array<String>) {
    val rd = (-1..1).random()
    when(rd) {
        0 -> println("zero")
        1 -> println("positive")
        -1 -> println("negative")
    }
}