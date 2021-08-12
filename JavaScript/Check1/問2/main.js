class Car {
    constructor(gasoline, number) {
        this.gasoline = gasoline;
        this.number = number;
    }

    getNumGas() {
        console.log(`ガソリンは${this.gasoline}です`)
        console.log(`ナンバーは${this.number}です`)
    }
}

let resolut = new Car('レギュラー', '1107');
resolut.getNumGas();