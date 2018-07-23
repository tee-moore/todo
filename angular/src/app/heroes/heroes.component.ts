import { Component, OnInit } from '@angular/core';

import { Hero } from '../hero';
import { HeroService } from '../hero.service';

@Component({
    selector: 'app-heroes',
    templateUrl: './heroes.component.html',
    styleUrls: ['./heroes.component.scss']
})
export class HeroesComponent implements OnInit {

    selectedHero: Hero;

    heroes: Hero[];


    constructor(private heroService: HeroService) { }



    add(title: string, description: string, status: string, created_at: number): void {
        title = title.trim();
        description = description.trim();
        created_at = Math.floor(Date.now()/1000);

        if (!title || !description) { return; }
        this.heroService.addHero({ title, description, status, created_at } as Hero)
            .subscribe(hero => {
                this.heroes.push(hero);
            });
        this.uploadFileToActivity();
    }

    delete(hero: Hero): void {
        this.heroes = this.heroes.filter(h => h !== hero);
        this.heroService.deleteHero(hero).subscribe();
    }

    ngOnInit() {
        this.getHeroes();
    }

    onSelect(hero: Hero): void {
        this.selectedHero = hero;
    }

    getHeroes(): void {
        this.heroService.getHeroes()
            .subscribe(heroes => this.heroes = heroes);
    }
}