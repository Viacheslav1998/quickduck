// Array methods: working with elements
// ===================================

// map - каждый элемент массива возвращает новый массив 
const arr = [1,2,3,4,5];
const doubled = arr.map(num => num * 2);
// console.log(doubled);

// convert to numbers - но основной массив останется целым
const strNum = ['1','2','3'];
const numbers = strNum.map(Number);
//console.log(typeof numbers[0]); // new arr type: Number 
//console.log(typeof strNum[0]); // arr default = string

// ==================================
// filters
const arrBoxNum1 = [1,2,3,4,5];
const evens = arr.filter(num => num % 2 === 0);
// console.log(evens); // [2,4]

// ==================================
// forEach выполняется для каждого элемента массива - возвращает undefined
const arrBoxNum2 = [1,2,3,4,5,6,7];
// arrBoxNum2.forEach(num => console.log(num * 2));

// ==================================
// find = возвращает 1 эл. по условию если ничего не найдено return undefined
const arrBoxNum3 = [66,77,213,523];
const found = arrBoxNum3.find(num => num > 78);
// console.log(found) // 213;