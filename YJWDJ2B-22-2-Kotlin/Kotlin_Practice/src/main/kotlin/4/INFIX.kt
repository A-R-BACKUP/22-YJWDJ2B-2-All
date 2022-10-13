package `4`

class INFIX {
}

infix fun Int.diff(other:Int):Int{
    if(this > other) return this-other
    else return other-this
}

fun main(){
    var diff = 3 diff 1 // 3.diff(1) 과 같음
    println(diff)
    diff = 1 diff 3
    println(diff)
}

