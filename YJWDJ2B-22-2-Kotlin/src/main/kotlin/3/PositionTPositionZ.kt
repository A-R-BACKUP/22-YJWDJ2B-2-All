package `3`

open class PositionTPositionZ(var x:Int, var y:Int) {
    constructor(n:Int):this(n, n)
}

class TPosition2(x:Int, y:Int, var z:Int): PositionTPositionZ(x, y)

fun main(){
    val t = TPosition2(0, 0, 0)
}
