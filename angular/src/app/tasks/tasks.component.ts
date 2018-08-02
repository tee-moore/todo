import { Component, OnInit } from '@angular/core';
import { Task } from '../task';
import { TaskService } from '../task.service';
import { myUrl } from '../config'

@Component({
    selector: 'app-tasks',
    templateUrl: './tasks.component.html',
    styleUrls: ['./tasks.component.scss']
})
export class TasksComponent implements OnInit {

    selectedTask: Task;
    tasks: Task[];
    imagefile: File = null;
    private url = myUrl;


    constructor(private taskService: TaskService) { }

    handleFileInput(files: FileList) {
        this.imagefile = files.item(0);
    }

    add(title: string, description: string, status: string, created_at: string): void {

        title = title.trim();
        description = description.trim();
        created_at = String(Math.floor(Date.now()/1000));
        let imagefile = this.imagefile;
        this.imagefile = null;

        if (!title || !description) { return; }

        this.taskService.addTask({ title, description, status, created_at, imagefile } as Task)
            .subscribe(task => {
                if(task) this.tasks.push( task );
            });
    }

    delete(task: Task): void {
        this.tasks = this.tasks.filter(h => h !== task);
        this.taskService.deleteTask(task).subscribe();
    }

    ngOnInit() {
        this.getTasks();
    }

    onSelect(task: Task): void {
        this.selectedTask = task;
    }

    getTasks(): void {
        this.taskService.getTasks()
            .subscribe(tasks => this.tasks = tasks);
    }
}