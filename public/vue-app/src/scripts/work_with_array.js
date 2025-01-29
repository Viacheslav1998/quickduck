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

// =================================
// reverse переворачивает массив на месте
const arrBoxNum10 = [1,2,'3',4,5,6,'7',8,9,10];
arrBoxNum10.reverse();
// console.log(arrBoxNum10);

// =================================
// concat объединяет 2 или более массивов в новый
const testBox1 = [1,2,3];
const testBox2 = [4,5,6];
const combined = testBox1.concat(testBox2);
// console.log(combined) 1,2,3,4,5,6;

// =================================
// splice - удаляет или добавляет элементы в массив на месте
// вероятно функционал больше чем в примере....
const arrBoxNum11 = [1,2,3,4,5,6];
arrBoxNum11.splice(1,2,99);
// console.log(arrBoxNum11);

// =================================
// push добовляем элементы в конец массива - изменяет массив и возвращает его длинну
const arrBoxNum12 = [1,2];
arrBoxNum12.push(3);
console.log(arrBoxNum12); // 1,2,3

// =================================
// pop удаляет последний элемент массива.
// Изменяет массив и возвращает удалённый элемент
const arrBoxNum13 = [1,2,3,4, 150];
const last = arrBoxNum13.pop();
// console.log(last);
// console.log(arrBoxNum13);

// =================================
// shift - удаляет первый элемент массива. Изменяет массив и возвращает удаленный эл.
const arrBoxNum14 = [1,2,3];
const first = arrBoxNum14.shift();
// console.log(first);
// console.log(arrBoxNum14);

// =================================
// unshift = добавляет элементы в начало массива. Изменяет массив и возвращает его длинну
const arrBoxNum15 = [2,3];
const sumElems = arrBoxNum15.unshift(1,2,3,4,5,6);
// console.log(arrBoxNum15);

// =================================
// join обьединяет элементы массива в строку. используя указанный разделитель
const arrBoxNum16 = [1,2,3,4];
const str = arrBoxNum16.join("-");
// console.log(str);

// =================================
// at возвращает элемент массива по индексу. Поддерживает отрицательные индексы
const arrBoxNum17 = [1,2,34];
// console.log(arrBoxNum17.at(-1)); // 34



// const cars_1 = new Array(["Saab", "Audi", "BMW"]);
// const cars_2 = ["AUDI", "BMW", "Nissan"];




