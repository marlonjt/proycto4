import {User} from '../authentication/models.index';
import {State} from '../ignug/models.index';
import {Attendance2} from './models.index';
import {Professional} from './professional';
import { Catalogue } from '../attendance/catalogue';

export class ProfessionalExperience {
    end_date(end_date: any) {
        throw new Error("Method not implemented.");
    }
    id: number;
    professional: Professional;
    employer: String;
    position: String;
    job_description: String;
    start_date: Date;
    finish_date:Date;
    reason_leave: String;
    current_work: boolean;
    state: State;
    constructor() {
        this.professional = new Professional();
        this.state = new State();
    }
}
