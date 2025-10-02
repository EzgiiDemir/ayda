// src/components/ui/ContactForm.tsx
"use client";
import { Locale, ContactField, sendContact } from "@/lib/cms";
import { useState } from "react";

export default function ContactForm({ locale, fields }:{ locale: Locale; fields: ContactField[] }) {
    const [state, setState] = useState<{[k:string]: string}>({});
    const [ok, setOk] = useState<string | null>(null);
    const [err, setErr] = useState<string | null>(null);
    const onChange = (n:string, v:string) => setState(s => ({...s, [n]: v}));

    async function onSubmit(e: React.FormEvent) {
        e.preventDefault();
        setOk(null); setErr(null);
        try {
            await sendContact(locale, state);
            setOk(locale==='tr' ? "Mesajınız alındı." : "Your message was received.");
            setState({});
        } catch (e:any) {
            setErr(e?.message ?? "Error");
        }
    }

    return (
        <form onSubmit={onSubmit} className="grid gap-3">
            {fields.map(f => (
                <label key={f.name} className="grid gap-1">
                    <span className="text-sm">{f.label}{f.required ? " *" : ""}</span>
                    {f.type === "textarea" ? (
                        <textarea
                            className="border rounded p-2"
                            required={!!f.required}
                            name={f.name}
                            value={state[f.name] ?? ""}
                            onChange={e=>onChange(f.name, e.target.value)}
                            rows={6}
                        />
                    ) : (
                        <input
                            className="border rounded p-2"
                            required={!!f.required}
                            type={f.type}
                            name={f.name}
                            value={state[f.name] ?? ""}
                            onChange={e=>onChange(f.name, e.target.value)}
                        />
                    )}
                </label>
            ))}
            <button type="submit" className="bg-ayda-pink-dark text-white rounded px-4 py-2">
                {locale === 'tr' ? 'Gönder' : 'Send'}
            </button>
            {ok && <p className="text-green-600 text-sm">{ok}</p>}
            {err && <p className="text-red-600 text-sm">{err}</p>}
        </form>
    );
}
