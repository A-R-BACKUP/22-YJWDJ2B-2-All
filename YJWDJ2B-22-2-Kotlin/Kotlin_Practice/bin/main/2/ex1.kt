package `2`

class ex1 {
    fun ex1(numbers: IntArray) = (0..9).filter { !numbers.contains(it) }.sum()

}

fun main() {
    ex1();
}

