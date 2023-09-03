const moreButton = document.getElementById("moreButton");
const additionalItems = document.querySelector(".additional-items");

moreButton.addEventListener("click", () => {
  // تغيير حالة عرض العناصر الإضافية ونص الزر
  if (additionalItems.style.display === "none") {
    additionalItems.style.display = "flex"; // تغيير العرض إلى "flex" لعرض العناصر جنبًا إلى جنب
    moreButton.textContent = "عرض أقل";
  } else {
    additionalItems.style.display = "none";
    moreButton.textContent = "المزيد";
  }
});