import * as pdfjsLib from "https://cdn.jsdelivr.net/npm/pdfjs-dist@4.0.379/build/pdf.min.mjs";
import * as pdfjsWorker from "https://cdn.jsdelivr.net/npm/pdfjs-dist@4.0.379/build/pdf.worker.min.mjs";

pdfjsLib.GlobalWorkerOptions.workerSrc = pdfjsWorker;

let canvas = document.getElementById('syllabus-viewer');
let syllabus = canvas.dataset.syllabus;

let state = {
    pdfDoc: null,
    numOfPages: null,
    currentPage: 1,
    scale: 2
};

// Render the Page
const renderPage = () => {
    state.pdfDoc.getPage(state.currentPage).then(page => {
        let viewport = page.getViewport({ scale: state.scale });

        let context = canvas.getContext('2d');
        canvas.width = viewport.width;
        canvas.height = viewport.height;

        let renderContext = {
            canvasContext: context,
            viewport: viewport
        };
        page.render(renderContext);

        document.getElementById('current-page').innerText = state.currentPage;
        document.getElementById('num-pages').innerText = state.numOfPages;
    });
}

// Load the Document
let loadingTask = pdfjsLib.getDocument(`course_syllabus/${syllabus}`);
loadingTask.promise.then(doc => {
    state.pdfDoc = doc;
    state.numOfPages = doc._pdfInfo.numPages;
    renderPage();
});

// Previous or Next
document.getElementById('prev').addEventListener('click', evt => {
    evt.preventDefault();
    if (state.currentPage > 1) {
        state.currentPage--;
        renderPage();
    }
    return;
});
document.getElementById('next').addEventListener('click', evt => {
    evt.preventDefault();
    if (state.currentPage < state.numOfPages) {
        state.currentPage++;
        renderPage();
    }
    return;
});