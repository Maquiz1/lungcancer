const interview_type1 = document.getElementById("interview_type1");
const interview_type2 = document.getElementById("interview_type2");

const kap_screening = document.getElementById("kap_screening");
const health_care_worker = document.getElementById("health_care_worker");
const kada = document.getElementById("kada");
const kitengo = document.getElementById("kitengo");


function toggleElementVisibility() {
  if (interview_type1.checked) {
    kada.style.display = "none";
    kitengo.style.display = "none";
    health_care_worker.style.display = "none";
    kap_screening.style.display = "block";
  } else if (interview_type2.checked) {
        kada.style.display = "block";
        kitengo.style.display = "block";
    health_care_worker.style.display = "block";
    kap_screening.style.display = "none";
  } else {
        kada.style.display = "none";
        kitengo.style.display = "none";
    health_care_worker.style.display = "none";
    kap_screening.style.display = "none";
  }
}

interview_type1.addEventListener("change", toggleElementVisibility);
interview_type2.addEventListener("change", toggleElementVisibility);

// Initial check
toggleElementVisibility();
