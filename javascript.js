let stepp = 'stepp1';

const stepp1 = document.getElementById('stepp1');
const stepp2 = document.getElementById('stepp2');
const stepp3 = document.getElementById('stepp3');
const stepp4 = document.getElementById('stepp4');

function next() {
  if (stepp === 'stepp1') {
    stepp = 'stepp2';
    console.log(stepp1);
    stepp1.classList.remove("is-active2");
    stepp1.classList.add("is-complete2");
    stepp2.classList.add("is-active2");
    
  } else if (stepp === 'stepp2') {
    stepp = 'stepp3';
    stepp2.classList.remove("is-active2");
    stepp2.classList.add("is-complete2");
    stepp3.classList.add("is-active2");

  } else if (stepp === 'stepp3') {
    stepp = 'stepp4d';
    stepp3.classList.remove("is-active2");
    stepp3.classList.add("is-complete2");
    stepp4.classList.add("is-active2");

  } else if (stepp === 'stepp4d') {
    stepp = 'complete';
    stepp4.classList.remove("is-active2");
    stepp4.classList.add("is-complete2");

  } else if (stepp === 'complete') {
    stepp = 'stepp1';
    stepp4.classList.remove("is-complete2");
    step3.classList.remove("is-complete2");
    stepp2.classList.remove("is-complete2");
    stepp1.classList.remove("is-complete2");
    stepp1.classList.add("is-active2");
  }
}