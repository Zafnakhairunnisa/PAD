const getImageUrl = (image) => {
    return require("@fe/assets/icons/" + image).default;
};

export default getImageUrl;
