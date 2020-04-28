//1
let city_1 ={};
city_1.name = 'ГородN';
city_1.population = 10e6;
//console.log(city_1);

//2
let city_2 ={
	name: 'ГородM',
	population:1e6
};
//console.log(city_2);


//3

let getName = function(){
	return this.name;
}
city_1.getName = getName;
//console.log(city_1.getName());
city_2.getName=function(){
	return this.name;
}
//console.log(city_2.getName());

//4
let expStr = function(){
	return 'name='+ this.name + '\n' + 'population=' + this.population;
}
city_1.exportStr = expStr;
city_2.exportStr = expStr;
//console.log(city_2.exportStr());

//5
function globOb (){
	return this;
}

city_1.getsName = function getsName(){

	return globOb().name;
};

console.log(city_1.getsName());

//6
let obj ={
	method1(){
console.log('method1');
return this;
	},
	method2(){
		console.log('method2');
	}

};
obj.method1().method2();

//7
/*let d1 = [45,78,10,3];
d1[7] = 100;
//console.log(d1[6],d1[7]);
*/
//8
let d1 = [45,78,10,3];
let sum=0;
for(let item of d1){
sum+=item;
}

//9
let d3 = [45,78,10,3];
d3[7]=100;
let summ=0;
let i=0;
for(let item in d3){
summ+=d3[item];
i++;
}
console.log(summ);

//10
let d4 = [45,78,10,3];
function myfunc(a,b){
return b-a;
}
d4.sort(myfunc);
console.log(d4);

//11
let d5 = [];
for(i=0;i<3;i++){
d5[i] = [];
	for(k=0;k<4;k++){
d5[i][k]=5;
	}

}
console.log(d5);

//1
function Card(from,to){
this.from = from;
this.to = to;

	
}
Card.prototype.show = function(){
	return this.from+this.to;
}

let c1 = new Card('city1','city2');
console.log(c1.show());

//2
class Human{
	constructor(name,age,height){

		this.name = name;
		this.age = age;
		this.height = height;

	}
	getInfo(){
		return this.name +' '+ this.age + ' '+ this.height;
	}
	firstName(){
		return this.name;
	}

}



let us1 = new Human('slawa',20,174);

let us2 = new Human('kate',30,168);
let us3 = new Human('tom',30,178);

let arr = [us1,us2,us3];
function mysort(a,b){
return a - b;
}

arr.sort(mysort);
arr.sort(function (a,b){
return a.height - b.height;
});
console.log(arr);