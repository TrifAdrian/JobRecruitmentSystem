let step = 'step1';

const step1 = document.getElementById('step1');
const step2 = document.getElementById('step2');
const step3 = document.getElementById('step3');
const step4 = document.getElementById('step4');

  if (step === 'step1') {
    step = 'step2';
    console.log(step1);
    step1.classList.remove("is-active2");
    step1.classList.add("is-complete2");
    step2.classList.add("is-active2");
    
  } else if (step === 'step2') {
    step = 'step3';
    step2.classList.remove("is-active2");
    step2.classList.add("is-complete2");
    step3.classList.add("is-active2");

  } else if (step === 'step3') {
    step = 'step4d';
    step3.classList.remove("is-active2");
    step3.classList.add("is-complete2");
    step4.classList.add("is-active2");

  } else if (step === 'step4d') {
    step = 'complete';
    step4.classList.remove("is-active2");
    step4.classList.add("is-complete2");

  } else if (step === 'complete') {
    step = 'step1';
    step4.classList.remove("is-complete2");
    step3.classList.remove("is-complete2");
    step2.classList.remove("is-complete2");
    step1.classList.remove("is-complete2");
    step1.classList.add("is-active2");
  }