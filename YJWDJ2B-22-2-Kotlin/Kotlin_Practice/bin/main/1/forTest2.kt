package `1`

class forTest2 {
}

fun main(){
    val array = Array(5) { it + 1 }
    for((index, value) in array.withIndex()){
        println("[${index}] $value")
    }

}