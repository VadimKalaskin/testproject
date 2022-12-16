import parsedData from "../parsed-data.json" assert { type: "json" };

const items = document.querySelectorAll(".slider__item");

for (let i = 0; i < items.length; i++) {
  let itemPhoto = items[i].querySelector(".item__photo");
  let itemTitle = items[i].querySelector(".item__title");
  let itemAbout = items[i].querySelector(".item__about");

  itemPhoto.innerHTML =
    '<img src="' + parsedData.url + parsedData.image + '"/>';
  itemTitle.innerHTML = parsedData.title;

  itemAbout.innerHTML = "";
  for (let j = 2; j < Object.keys(parsedData).length - 3; j = j + 2) {
    itemAbout.innerHTML +=
      "<p>" + parsedData[j] + "<span>" + parsedData[j + 1] + "</span>" + "</p>";
  }
}
