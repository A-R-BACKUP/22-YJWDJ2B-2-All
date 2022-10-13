package `2`

class Ramdareturn {
}

//fun foo() {
fun main() {
    listOf(1, 2, 3, 4, 5).forEach lit@{
        if (it == 3) return@lit //local return t
        print(it)
    }
    print(" done with explict label ")
}