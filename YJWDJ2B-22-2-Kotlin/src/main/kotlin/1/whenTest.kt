package `1`

class whenTest {
}

fun main(args: Array<String>) {
    val num = (-1..1).random()
    when(num){
        0, 1 -> println("$num - pass")
        -1 -> println("$num - fail")
    }
}