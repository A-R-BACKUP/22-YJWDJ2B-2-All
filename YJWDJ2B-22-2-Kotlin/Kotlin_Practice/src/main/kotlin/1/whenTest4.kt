package `1`

class whenTest4 {
}

fun main(args: Array<String>) {
    val array= arrayOf(1, 2, 3, "a", "b", "c")
    array.forEach { it -> when(it) {
        is String -> println("$it is String")
        else -> println("$it is Integer")
        }
    }
}