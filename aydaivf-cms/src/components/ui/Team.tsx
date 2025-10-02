// src/components/ui/Team.tsx
import { OurTeamResponse } from "@/lib/cms";

type Props = { data: OurTeamResponse };

export default function Team({ data }: Props) {
    const hero = data.heroImage ?? "https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg";
    const [sec0, sec1] = data.sections ?? [];

    return (
        <main className="flex-1 flex flex-col">
            <div>
                <div
                    className="bg-gray-300 w-full aspect-[16/7] md:aspect-[16/5] max-h-[400px]"
                    style={{ backgroundImage:`url("${hero}")`, backgroundRepeat:"no-repeat", backgroundPosition:"center center", backgroundSize:"cover" }}
                />
                <div className="container flex flex-col gap-5 py-5 md:py-10">
                    <p className="text-ayda-blue text-lg md:text-xl text-center uppercase font-medium">
                        {data.title}
                    </p>

                    {/* Intro + first section heading */}
                    <div className="flex flex-col gap-3">
                        <div className="flex flex-col lg:flex-row gap-6 items-center">
                            <div className="flex-1 flex flex-col gap-2">
                                {sec0?.heading ? (
                                    <p className="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">
                                        {sec0.heading}
                                    </p>
                                ) : null}
                                {data.intro ? (
                                    <div className="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
                                        <div dangerouslySetInnerHTML={{ __html: data.intro }} />
                                    </div>
                                ) : null}
                            </div>
                        </div>
                    </div>

                    {/* Grid */}
                    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mt-3">
                        {data.members.map(m => (
                            <div key={m.slug} className="border border-gray-200 rounded-md overflow-hidden hover:shadow-sm transition-shadow">
                                {m.image ? (
                                    <div className="w-full aspect-[4/3] bg-gray-100"
                                         style={{ backgroundImage:`url("${m.image}")`, backgroundSize:"cover", backgroundPosition:"center" }} />
                                ) : (
                                    <div className="w-full aspect-[4/3] bg-gray-100" />
                                )}
                                <div className="p-4 flex flex-col gap-1">
                                    <p className="text-sm md:text-base font-semibold text-ayda-gray-dark">{m.name}</p>
                                    {m.role ? <p className="text-xs md:text-sm text-ayda-pink-light">{m.role}</p> : null}
                                    {m.bio ? (
                                        <div className="text-xs md:text-sm text-ayda-gray-dark mt-2"
                                             dangerouslySetInnerHTML={{ __html: m.bio }} />
                                    ) : null}
                                </div>
                            </div>
                        ))}
                    </div>

                    {/* Second section */}
                    {(sec1?.heading || sec1?.html) ? (
                        <div className="flex flex-col gap-3 mt-6">
                            <div className="flex flex-col lg:flex-row gap-6 items-center">
                                <div className="flex-1 flex flex-col gap-2">
                                    {sec1?.heading ? (
                                        <p className="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">
                                            {sec1.heading}
                                        </p>
                                    ) : null}
                                    {sec1?.html ? (
                                        <div className="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
                                            <div dangerouslySetInnerHTML={{ __html: sec1.html }} />
                                        </div>
                                    ) : null}
                                </div>
                            </div>
                        </div>
                    ) : null}
                </div>
            </div>
        </main>
    );
}
