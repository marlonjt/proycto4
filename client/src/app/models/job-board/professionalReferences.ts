import {Professional, } from './models.index';
import {State, Catalogue} from './../ignug/models.index';

export class ProfessionalReferences {
    id: number;
    professional: Professional;
    institution: Catalogue;
    position: string;
    contact: string;
    phone: string;
    state: State;

    constructor() {
        this.professional = new Professional();
        this.state = new State();
        this.institution = new Catalogue();

    }
}


