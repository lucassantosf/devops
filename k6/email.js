function generate_email(){
    var chars = 'abcdefghijklmnopqrstuvwxyz1234567890';
    var string = '';
    for(var ii=0; ii<15; ii++){
        string += chars[Math.floor(Math.random() * chars.length)];
    }
    return `${string}@gmail.com`
}

function generate_phone(){
    var chars = '0123456789';
    var string = '';
    for(var ii=0; ii<8; ii++){
        string += chars[Math.floor(Math.random() * chars.length)];
    }
    return `55159${string}`
}

function makeid() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  
    for (var i = 0; i < 5; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));
  
    return text;
}

function generateName() {
    const n1 = ["Messi", "Cristiano", "Luciano", "Marcos", "Vini", "Rodrygo", "Capanema", "Romario", "Dudu", "Bebeto", "Ronaldo", "Rivaldo", "Kaka", "Mané", "Salah", ""];
    const n2 = ["One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Zero", "Silva", "Almeida", "Abn", "Abc"]
    return n1[parseInt(Math.random() * n1.length)] + ' ' +n2[parseInt(Math.random() * n2.length)];
}

console.log(makeid())
console.log(generateName())
console.log(generate_email())
console.log(generate_phone())
