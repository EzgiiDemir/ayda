// src/components/site/Hero.tsx
"use client";

type HeroData = {
    background: string; // URL (absolute ya da /uploads/...)
    dots: string;       // URL (absolute ya da /images/dots.png)
    title: string;
    subtitle: string;
    footerText: string;
    workhours: string;
};

const API_BASE = (process.env.NEXT_PUBLIC_API ?? process.env.NEXT_PUBLIC_API_URL ?? "").replace(/\/+$/, "");
const toAbs = (u?: string | null) =>
    !u ? "" : /^https?:|^data:/i.test(u) ? u : `${API_BASE}${u.startsWith("/") ? u : `/${u}`}`;

export default function Hero({ background, dots, title, subtitle, footerText, workhours }: HeroData) {
    return (
        <section className="relative h-[calc(70dvh-80px)] md:h-[calc(100dvh-80px)]">
            {/* Arkaplan (tam kapsa, araya girmesin) */}
            <div
                className="absolute inset-0 z-0 pointer-events-none"
                style={{
                    backgroundImage: `
      linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
      url("${toAbs(dots)}"),
      url("${toAbs(background)}")
    `,
                    backgroundRepeat: "repeat, no-repeat, no-repeat",
                    backgroundPosition: "left top, center center, center center",
                    backgroundSize: "auto, cover, cover",
                }}
            />

            {/* Ortadaki başlıklar */}
            <div className="z-30 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                <p className="text-sm breakpoint-500:text-base md:text-xl text-ayda-pink-light">
                    {subtitle}
                </p>
                <p className="text-2xl breakpoint-500:text-3xl md:text-6xl text-ayda-pink-dark font-medium">
                    {title}
                </p>
            </div>

            {/* Döndürülmüş çalışma saatleri */}
            <p className="z-30 font-medium uppercase absolute top-1/2 right-0 -translate-y-1/2 text-xs md:text-xl text-ayda-white tracking-[5px] rotate-90 translate-x-[calc(50%-16px)] breakpoint-500:translate-x-[calc(50%-24px)] md:translate-x-[calc(50%-28px)] whitespace-nowrap">
                {workhours}
            </p>

            {/* Alt şerit (border dahil) */}
            <div className="z-30 absolute bottom-[5px] left-0 right-0 flex flex-col sm:flex-row gap-1 items-start sm:gap-0 sm:justify-between  w-full px-4">
                <p className="capitalize text-xs md:text-sm text-ayda-white font-medium">
                    {footerText}
                </p>
            </div>
        </section>
    );
}
