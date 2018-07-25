import { Component, OnInit, Input } from '@angular/core';
import { Hero } from '../hero';
import { HeroService } from '../hero.service';

@Component({
    selector: 'app-hero-detail',
    templateUrl: './hero-detail.component.html',
    styleUrls: ['./hero-detail.component.scss']
})
export class HeroDetailComponent implements OnInit {
    @Input() hero: Hero;

    started_at: number = 0;
    constructor(private heroService: HeroService) { }

    ngOnInit() {
    }

    save(): void {

        if(this.hero.status != 'new'){
            this.hero.started_at = Math.floor(Date.now()/1000);
        }

        this.heroService.updateHero(this.hero)
            .subscribe(() => this.hero);
    }

}