import { Component, OnInit, Input } from '@angular/core';
import { Task } from '../task';
import { TaskService } from '../task.service';

@Component({
    selector: 'app-task-detail',
    templateUrl: './task-detail.component.html',
    styleUrls: ['./task-detail.component.scss']
})
export class TaskDetailComponent implements OnInit {
    @Input() task: Task;

    started_at: number = 0;
    constructor(private taskService: TaskService) { }

    ngOnInit() {
    }

    save(): void {

        if(this.task.status != 'new'){
            this.task.started_at = Math.floor(Date.now()/1000);
        }

        this.taskService.updateTask(this.task)
            .subscribe(() => this.task);
    }

}