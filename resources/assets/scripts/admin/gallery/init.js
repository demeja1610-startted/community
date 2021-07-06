import { lightbox } from "./lightbox";
import {uploadInput} from './upload-input';
import { massRemove } from "./mass-remove";

export function gallery() {
    lightbox();
    uploadInput();
    massRemove();
}
