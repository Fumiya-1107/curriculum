let number = 1;

while (number <= 100) {
	console.log(number);
	number++;

	if (number % 3 == 0 && number % 5 == 0) {
		console.log("FizzBuzz");
		number++;
	} else if (number % 3 == 0) {
		console.log("Fizz");
		number++;
	} else if (number % 5 == 0) {
		console.log("Buzz");
		number++;
	}
}