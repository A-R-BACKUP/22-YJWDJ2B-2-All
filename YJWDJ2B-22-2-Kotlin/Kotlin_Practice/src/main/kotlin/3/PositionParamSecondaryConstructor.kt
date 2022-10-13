package `3`


class PositionParamSecondaryConstructor (var x:Int, var y:Int){
    init { println ("($x, $y)") }
    constructor(n:Int):this(n, n){}
}

fun main() {
    val p1 = PositionParamSecondaryConstructor(0, 0)
    val p2 = PositionParamSecondaryConstructor(10, 10)
    val p3 = PositionParamSecondaryConstructor(3)
}
