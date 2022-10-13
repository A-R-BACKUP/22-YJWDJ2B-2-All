package `1`

class if_eles_Expression {
}

fun main(args: Array<String>) {
    val value = (-5..5).random()
    val absValue = if (value < 0) value*-1 else value
    println("value=${value}, abs=${absValue}")
}

// yachu