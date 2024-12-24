// just test iteration
const numbers = [1,2,3,4,5];
const collectionNumbers = [];
const lengthNum = numbers.length;

// even number sorting
for(let i = 0; i < lengthNum; i++) {
  if(numbers[i] % 2 === 0) {
    collectionNumbers.push(numbers[i] * 2);
  }
}


// another axample work with pop/push
const space = [];
const spb = { name: 'SanktPeterBug' };
const arrbox = ['name', 'age', 'city']; 

space.push(arrbox);
space.push(spb);

console.log(space);
space.pop(arrbox);
console.log(space);

//  console.log(collectionNumbers);
//  console.log(numbers);