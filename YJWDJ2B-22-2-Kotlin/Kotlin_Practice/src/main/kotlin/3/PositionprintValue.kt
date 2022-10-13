package `3`

open class PositionprintValue(var x:Int, var y:Int) {
    constructor(n:Int):this(n, n)
    open fun printValue(){
        println("($x, $y)")
    }
}

class TPosition(x:Int, y:Int, var z:Int): PositionprintValue(x, y){
    override fun printValue(){
        println("($x, $y, $z)")
    }
}

fun main(){
    val p = PositionprintValue(1, 1)
    p.printValue()
    val t = TPosition(0, 0, 0)
    t.printValue()
}