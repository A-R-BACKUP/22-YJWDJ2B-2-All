package `1`

class forTest {
}

fun main(){
    val dan=(2..9).random()
    for (i in 1..9){
        println("$dan x $i = ${dan*i}")
    }
}