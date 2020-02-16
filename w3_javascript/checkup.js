// create a loop that prints every second number starting from 10 and ending with 20

for (let i = 10; i <= 20; i+=2) {
  console.log(i);
}

//loop thru an array and print out it's content 

let arr = [1,2,3,4,5];

arr.forEach(function(v,i) {
  console.log("Value " + v," index " + i)
})

//Modify array of numbers by multiplying the numbers by itself

 arr.map(function(val, index) {
    console.log("Value multiplied by 2 is " + val*2);
 })

 //Declare a function that can be called even if it's defined after it is called

 fn1();

 function fn1() {
   console.log("Call for fn 1");
 }

 //define a function that can be called only after it has been declared

 var fn2 = function fn2() {
  console.log("Call for fn 2");
}

fn2();

//create an arrow function with two or more parameters

let fn3 = (a,b) => {
    console.log(a*b);
}

fn3 (2,4)

//create a function with unknown amount of parameters

function fn4(var1, ...var2) {
		const arr = var2;

		arr.push(var1)

		arr.forEach((val) => {
			console.log("val " + val);
		})
}

//Create a function that accepts object as an parameters and reads assigns it's key/value pairs to function variables

function fn5(params) {
		const {name, age, gender} = params
		console.log("My name is " + name)
		console.log("Im " + age + " old");
}

fn5({name: "Ed", age: "25", gender:"dog"})

// Create your own prototype
// create new instance
// call a function from it

function user(username,password) {
	this.username = username;
	this.password = password;

	this.checkuser = function(uname,pass){
		if(this.username === uname && this.password === pass) {
			console.log("Login Success");
		} else {
			console.log("Please check you username or password")
		}
	}
}

let toms = new user("tomixxx", "parole")

toms.checkuser("tomixxx", "parole")

toms.checkuser("tomix", "parole")