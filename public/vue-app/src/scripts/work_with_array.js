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

// ==================================
// findIndex - возвр индекс 1вого элемента который true. если false = return -1
const arrBoxNum4 = [1,2,3,4,5,6,22,56];
const index_1 = arrBoxNum4.findIndex(num => num > 2);
// console.log(index_1); // 2

// ==================================
// reduce - сводит массив к одному значению, применяя функцию-аккумулятор
// 1 + 2, 3 + 3, 6 + 4. и тд
const arrBoxNum5 = [1,2,3,4];
const sum_1 = arrBoxNum5.reduce((acc, num) => acc + num, 0);
// console.log(sum_1); // 10

// ==================================
// some - проверяет если хотя бы 1 эл. который удов. условию return (true || false)
const arrBoxNum6 = [7];
const hasEven = arrBoxNum6.some(num => num % 2 === 0);
// console.log(hasEven); // false

// ==================================
// every - проверят удовлетворяют ли все элементы условию. return (true || false)
const arrBoxNum7 = [2,4,6];
const allEven = arrBoxNum7.every(num => num % 2 === 0);
// console.log(allEven); // true 

// ==================================
// includes - проверяет содержит ли массив указанный элемент (true || false)
const arrBoxNum8 = [1,2,3,343];
// console.log(arrBoxNum8.includes(4)); // false
// console.log(arrBoxNum8.includes(343)); // true

// =================================
// sort - сортирует массив на месте - можно передать свою функцию сравнения
// получается что изменяет основной массив ?
const arrBoxNum9 = [4,10,7,1009,283,212];
const resultSort = arrBoxNum9.sort((a, b) => a - b);
// console.log(resultSort);
// console.log(arrBoxNum9);




