package `1`

class whenTest2 {
}

fun main(args: Array<String>) {
    val score = (0..100).random()
    var grade = when(score){
        in 90..100 -> "A"
        in 80..90 -> "B"
        in 70..80 -> "C"
        in 60..70 -> "D"
        else -> "F"
    }
    println("Score:$score, Grade:$grade")

}